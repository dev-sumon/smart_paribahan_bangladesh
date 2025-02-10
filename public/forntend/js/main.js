

// FAQ section JS start
document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const faqItem = question.parentElement;
        faqItem.classList.toggle('open');
    });
});
// FAQ section JS end
// whell scrolling number up-down js start

function animatePrice(element) {
    let originalValue = parseInt(element.getAttribute('data-original'));
    let currentValue = 0;
    let increment = Math.ceil(originalValue / 200);

    let interval = setInterval(function() {
        if (currentValue < originalValue) {
            currentValue += increment;
            if (currentValue > originalValue) {
                currentValue = originalValue;
            }
            element.innerText = currentValue;
        } else {
            clearInterval(interval);
        }
    }, 30);
}


let observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            let elements = entry.target.querySelectorAll('.price');
            elements.forEach(animatePrice);
        }
    });
}, { threshold: 0.5 });

let targetSection = document.getElementById('price-section'); 
if (targetSection) {
    observer.observe(targetSection);
}
// whell scrolling number up-down js end

// login and register button js start
function redirectToLogin(){
    window.location.href = 'login.html';
}

    document.addEventListener("DOMContentLoaded", function(){
        let loginButton = document.getElementById("loginButton");
        if(loginButton){
            loginButton.addEventListener("click", redirectToLogin)
        }
    });

// login and register button js end


const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        preferredCountries: ["bd", "us", "gb", "in"],
        separateDialCode: true,
        initialCountry: "bd",
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });


