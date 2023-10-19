const burger = document.querySelector('.burger');
const menu = document.querySelector('.menu');

burger.addEventListener('click', () => {
    menu.classList.toggle('show');
});



const revealElements = document.querySelectorAll(".reveal");

function checkScroll() {
    for (let element of revealElements) {
        const elementTop = element.getBoundingClientRect().top;
        if (elementTop < window.innerHeight - 100 && elementTop > -element.clientHeight) {
            element.classList.add("revealed");
        } else {
            element.classList.remove("revealed");
        }
    }
}

function animate() {
    checkScroll();
    requestAnimationFrame(animate);
}

animate();


