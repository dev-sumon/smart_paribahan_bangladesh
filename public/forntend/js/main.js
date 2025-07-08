

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

    let interval = setInterval(function () {
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


let observer = new IntersectionObserver(function (entries) {
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
function redirectToLogin() {
    window.location.href = 'login.html';
}

document.addEventListener("DOMContentLoaded", function () {
    let loginButton = document.getElementById("loginButton");
    if (loginButton) {
        loginButton.addEventListener("click", redirectToLogin)
    }
});

// login and register button js end










// sweet alert start
function confirmDelete(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

$(document).ready(function () {
    $('.delete').on('click', function () {
        let url = $(this).data('url');
        confirmDelete(url);
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});


// status change
$(document).ready(function () {
    // Status update confirmation
    $('.status-update').on('click', function () {
        let url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to update the status!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });

    // Show SweetAlert for success/error
    if (window.sessionSuccess) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: window.sessionSuccess,
            confirmButtonText: 'Okay',
            timer: 3000,
            timerProgressBar: true
        });
    }

    if (window.sessionError) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: window.sessionError,
            confirmButtonText: 'Okay'
        });
    }
});
