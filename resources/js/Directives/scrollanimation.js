// v-animate.js

const animatedScrollObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const animationClasses = entry.target.getAttribute(
                "data-animation-classes"
            );
            if (animationClasses) {
                const classes = animationClasses.split(" ");
                classes.forEach((className) =>
                    entry.target.classList.add(className)
                );
            }
            observer.unobserve(entry.target);
        }
    });
});

export default {
    mounted(el, binding) {
        const animationClasses = binding.value;
        el.setAttribute("data-animation-classes", animationClasses);
        animatedScrollObserver.observe(el);
    },
    unmounted(el) {
        animatedScrollObserver.unobserve(el);
    },
};
