import { jsPDF } from 'jspdf';
import html2canvas from 'html2canvas';
import autoTable from 'jspdf-autotable';

/**
 * Exporte un élément HTML en PDF
 *
 * @param {string} elementId - ID de l'élément HTML à exporter
 * @param {string} filename - Nom du fichier PDF à générer
 * @param {Object} options - Options supplémentaires
 * @param {number} options.scale - Échelle de rendu (défaut: 2)
 * @param {string} options.format - Format du PDF (défaut: 'a4')
 * @param {string} options.orientation - Orientation du PDF (défaut: 'portrait')
 * @param {number} options.margin - Marge en mm (défaut: 10)
 */
export const exportToPdf = async (elementId, filename, options = {}) => {
    // Options par défaut
    const defaultOptions = {
        scale: 2,
        format: 'a4',
        orientation: 'portrait',
        margin: 10
    };

    // Fusionner les options par défaut avec les options fournies
    const settings = { ...defaultOptions, ...options };

    try {
        // Récupérer l'élément à exporter
        const element = document.getElementById(elementId);
        if (!element) {
            throw new Error(`L'élément avec l'ID "${elementId}" n'a pas été trouvé.`);
        }

        // Créer une copie de l'élément pour le formatage
        const clonedElement = element.cloneNode(true);
        clonedElement.style.backgroundColor = '#ffffff';

        // Ajouter temporairement l'élément cloné au document
        clonedElement.style.position = 'absolute';
        clonedElement.style.left = '-9999px';
        document.body.appendChild(clonedElement);

        // Convertir l'élément en canvas
        const canvas = await html2canvas(clonedElement, {
            scale: settings.scale,
            logging: false,
            useCORS: true
        });

        // Supprimer l'élément cloné
        document.body.removeChild(clonedElement);

        // Créer un nouveau document PDF
        const pdf = new jsPDF({
            format: settings.format,
            orientation: settings.orientation,
            unit: 'mm'
        });

        // Dimensions du PDF
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = pdf.internal.pageSize.getHeight();

        // Dimensions du contenu (avec marges)
        const contentWidth = pdfWidth - (settings.margin * 2);
        const contentHeight = (canvas.height * contentWidth) / canvas.width;

        // Ajouter l'image au PDF
        const imgData = canvas.toDataURL('image/png');

        // Si le contenu est plus grand que la page, diviser en plusieurs pages
        if (contentHeight > pdfHeight - (settings.margin * 2)) {
            // Calculer le nombre de pages nécessaires
            const pageCount = Math.ceil(contentHeight / (pdfHeight - (settings.margin * 2)));

            // Hauteur de contenu par page
            const pageContentHeight = canvas.height / pageCount;

            // Créer chaque page
            for (let i = 0; i < pageCount; i++) {
                // Ajouter une nouvelle page après la première
                if (i > 0) {
                    pdf.addPage();
                }

                // Calculer la partie de l'image à afficher sur cette page
                const sourceY = pageContentHeight * i;
                const sourceHeight = Math.min(pageContentHeight, canvas.height - sourceY);

                // Ajouter l'image à la page
                pdf.addImage(
                    imgData,
                    'PNG',
                    settings.margin,
                    settings.margin,
                    contentWidth,
                    (sourceHeight * contentWidth) / canvas.width,
                    null,
                    'FAST',
                    0,
                    sourceY / canvas.height,
                    1,
                    sourceHeight / canvas.height
                );
            }
        } else {
            // Si le contenu tient sur une seule page
            pdf.addImage(
                imgData,
                'PNG',
                settings.margin,
                settings.margin,
                contentWidth,
                contentHeight
            );
        }

        // Télécharger le PDF
        pdf.save(`${filename}.pdf`);

        return true;
    } catch (error) {
        console.error('Erreur lors de l\'exportation en PDF:', error);
        return false;
    }
};

/**
 * Exporte un tableau de données en PDF
 *
 * @param {Array} data - Tableau de données à exporter
 * @param {Array} columns - Colonnes à inclure dans le PDF
 * @param {string} filename - Nom du fichier PDF
 * @param {string} title - Titre du document
 */
export const exportTableToPdf = (data, columns, filename, title) => {
    // Créer un nouveau document PDF
    const pdf = new jsPDF({
        orientation: 'landscape',
        unit: 'mm',
        format: 'a4'
    });

    // Ajouter le titre
    pdf.setFontSize(18);
    pdf.text(title, 14, 22);

    // Ajouter la date
    pdf.setFontSize(11);
    pdf.text(`Généré le ${new Date().toLocaleDateString('fr-FR')}`, 14, 30);

    // Définir les colonnes pour le tableau
    const tableColumns = columns.map(col => ({
        header: col.label,
        dataKey: col.key
    }));

    // Préparer les données pour le tableau
    const tableData = data.map(item => {
        const row = {};
        columns.forEach(col => {
            if (typeof col.format === 'function') {
                row[col.key] = col.format(item[col.key], item);
            } else {
                row[col.key] = item[col.key];
            }
        });
        return row;
    });

    // Générer le tableau
    autoTable(pdf, {
        startY: 40,
        head: [tableColumns.map(col => col.header)],
        body: tableData.map(row => tableColumns.map(col => row[col.dataKey])),
        theme: 'grid',
        headStyles: {
            fillColor: [28, 51, 140], // Couleur bleu foncé (#1c338c)
            textColor: 255,
            fontStyle: 'bold'
        },
        alternateRowStyles: {
            fillColor: [240, 240, 250]
        },
        margin: { top: 40, right: 14, bottom: 20, left: 14 }
    });

    // Télécharger le PDF
    pdf.save(`${filename}.pdf`);
};

export default {
    exportToPdf,
    exportTableToPdf
};
