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


// update alert

// sweetalert end
// Slug js 

function slugGenerate(title) {
    let inputTitle = title.val();
    let slug = inputTitle.toLowerCase().replace(/ /g, '-');
    $('#slug').val(slug);
}
