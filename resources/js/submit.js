document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const category = document.querySelector('#category');
    const comment = document.querySelector('#comment');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const commentValue = comment.value.trim();

        // Simple client-side validation
        if (!category.value) {
            alert('Please select a category.');
            return;
        }

        if (commentValue.length < 10) {
            alert('Comment must be at least 10 characters long.');
            return;
        }

        // Prepare form data
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(res => {
            if (!res.ok) throw new Error('Failed to submit');
            return res.json();
        })
        .then(data => {
            alert('Your comment was submitted successfully!');
            form.reset();
        })
        .catch(error => {
            alert('An error occurred while submitting your comment.');
            console.error(error);
        });
    });
});
