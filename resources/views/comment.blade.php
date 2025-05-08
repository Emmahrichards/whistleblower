<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Comment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/d.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4><b>Whistleblower</b></h4>
                </div>
                <div class="card-body">

                  
                    <!-- Form Start -->
                    <form method="POST" action="{{ route('submit.comment') }}" id="commentForm">
                     @csrf
                        <!-- Category Selection -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Select Category</label>
                            <select name="category" id="category" class="form-select" required>
                                <option value="" disabled {{ old('category') ? '' : 'selected' }}>Select a category</option>
                                <option value="1" {{ old('category') == '1' ? 'selected' : '' }}>General</option>
                                <option value="2" {{ old('category') == '2' ? 'selected' : '' }}>Integrity</option>
                            </select>
                        </div>

                        <!-- Comment Box -->
                        <div class="mb-3">
                            <label for="comment" class="form-label">Your Comment</label>
                            <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                   
                    <script>
document.getElementById("commentForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent normal form submission

    var form = event.target;
    var formData = new FormData(form); // Collect form data

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,  // CSRF token
            'Accept': 'application/json',
        },
        body: formData,  // Send the form data in the request body
    })
    .then(response => response.json())  // Parse the JSON response
    .then(data => {
        if (data.success) {
            alert('Your comment has been submitted successfully.');
        } else {
            alert('There was an error submitting your comment.');
        }
    })
    .catch(error => {
        console.error('Error submitting form:', error);
        alert('An error occurred while submitting your comment.');
    });
});
</script>
                  
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
