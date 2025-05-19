/**
 * Configuration des métadonnées SEO pour le site
 */

export const siteConfig = {
    siteName: 'Centre Nganda',
    siteUrl: 'https://centrenganda.com',
    siteDescription: 'Centre hospitalier spécialisé dans le traitement du cancer et les soins de qualité à Kinshasa, République Démocratique du Congo.',
    siteKeywords: 'centre hospitalier, cancer, radiothérapie, soins médicaux, Kinshasa, RDC, Congo, santé',
    siteImage: '/assets/images/logo.png',
    twitterHandle: '@centrenganda',
    locale: 'fr_FR',
};

/**
 * Métadonnées SEO pour chaque page
 */
export const pageMeta = {
    home: {
        title: 'Accueil | Centre Nganda - Centre Hospitalier Spécialisé à Kinshasa',
        description: 'Centre Nganda offre des soins médicaux de qualité et des traitements spécialisés contre le cancer à Kinshasa, République Démocratique du Congo.',
        keywords: 'centre hospitalier, cancer, radiothérapie, soins médicaux, Kinshasa, RDC',
        image: '/assets/images/hero.jpg',
        url: '/',
    },
    about: {
        title: 'À propos | Centre Nganda - Notre Histoire et Notre Mission',
        description: 'Découvrez l\'histoire, la mission et les valeurs du Centre Nganda, un centre hospitalier d\'excellence à Kinshasa, République Démocratique du Congo.',
        keywords: 'à propos, histoire, mission, valeurs, centre hospitalier, Kinshasa, RDC',
        image: '/assets/images/about.jpg',
        url: '/about',
    },
    services: {
        title: 'Services | Centre Nganda - Nos Services Médicaux Spécialisés',
        description: 'Centre Nganda offre une gamme complète de services médicaux spécialisés, incluant la radiothérapie, l\'oncologie, la pédiatrie, la cardiologie, la neurologie et plus encore à Kinshasa. Premier centre médical privé à introduire le scanner en RDC.',
        keywords: 'services médicaux, radiothérapie, oncologie, pédiatrie, cardiologie, neurologie, chirurgie, médecine interne, dermatologie, gynécologie, orthopédie, urologie, gastro-entérologie, ophtalmologie, médecine d\'urgence, réhabilitation, pharmacie, Kinshasa, RDC',
        image: '/assets/images/services.jpg',
        url: '/services',
    },
    radiotherapie: {
        title: 'Radiothérapie | Centre Nganda - Traitement Spécialisé du Cancer',
        description: 'Le Centre Nganda propose des traitements de radiothérapie avancés pour combattre efficacement le cancer à Kinshasa, République Démocratique du Congo.',
        keywords: 'radiothérapie, traitement du cancer, oncologie, Kinshasa, RDC',
        image: '/assets/images/radiotherapie.jpg',
        url: '/radiotherapie',
    },
    contact: {
        title: 'Contact | Centre Nganda - Nous Contacter',
        description: 'Contactez le Centre Nganda pour prendre rendez-vous ou obtenir plus d\'informations sur nos services médicaux à Kinshasa, République Démocratique du Congo.',
        keywords: 'contact, rendez-vous, informations, centre hospitalier, Kinshasa, RDC',
        image: '/assets/images/contact.jpg',
        url: '/contact',
    },
    blog: {
        title: 'Blog | Centre Nganda - Actualités et Articles de Santé',
        description: 'Découvrez les dernières actualités, conseils de santé et informations médicales sur le blog du Centre Nganda à Kinshasa, République Démocratique du Congo.',
        keywords: 'blog, actualités, conseils santé, informations médicales, Kinshasa, RDC',
        image: '/assets/images/blog.jpg',
        url: '/blog',
    },
    internship: {
        title: 'Stage | Centre Nganda - Opportunités de Stage',
        description: 'Découvrez les opportunités de stage au Centre Nganda, un centre hospitalier d\'excellence à Kinshasa, République Démocratique du Congo.',
        keywords: 'stage, opportunités, formation médicale, centre hospitalier, Kinshasa, RDC',
        image: '/assets/images/internship.jpg',
        url: '/internship',
    },
};

/**
 * Génère les métadonnées SEO pour une page spécifique
 * @param {string} page - Nom de la page
 * @param {Object} customMeta - Métadonnées personnalisées (optionnel)
 * @returns {Object} - Métadonnées SEO complètes
 */
export function getSeoMeta(page, customMeta = {}) {
    const meta = pageMeta[page] || pageMeta.home;

    return {
        title: customMeta.title || meta.title,
        description: customMeta.description || meta.description,
        keywords: customMeta.keywords || meta.keywords,
        image: customMeta.image || meta.image,
        url: customMeta.url || `${siteConfig.siteUrl}${meta.url}`,
        siteName: siteConfig.siteName,
        locale: siteConfig.locale,
        type: customMeta.type || 'website',
    };
}

/**
 * Génère les métadonnées SEO pour un article de blog
 * @param {Object} post - Article de blog
 * @returns {Object} - Métadonnées SEO pour l'article
 */
export function getPostSeoMeta(post) {
    if (!post) return getSeoMeta('blog');

    // Extraire le texte brut du contenu HTML
    const stripHtml = (html) => {
        const tmp = document.createElement('DIV');
        tmp.innerHTML = html;
        return tmp.textContent || tmp.innerText || '';
    };

    // Créer un extrait pour la description si nécessaire
    const description = post.excerpt || stripHtml(post.content).substring(0, 160);

    // Construire l'URL complète
    const url = `/blog/${post.slug}`;

    // Obtenir l'image principale
    const image = post.featured_image
        ? `${siteConfig.siteUrl}/storage/${post.featured_image}`
        : `${siteConfig.siteUrl}${pageMeta.blog.image}`;

    return getSeoMeta('blog', {
        title: `${post.title} | Blog | ${siteConfig.siteName}`,
        description,
        image,
        url,
        type: 'article',
        // Métadonnées spécifiques aux articles
        article: {
            publishedTime: post.published_at,
            modifiedTime: post.updated_at,
            author: post.user?.name || 'Centre Nganda',
        },
    });
}
