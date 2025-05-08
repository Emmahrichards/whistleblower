<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Admin Log In</h4>
                </div>
                <div class="card-body">  
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                    
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Log In</button>
                        </div>
                    </form>

                    <div id="message" class="mt-3"></div> <!-- Display success/error message here -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        var formData = new FormData(this); // Create FormData from the form

        // Send the login request via AJAX
        fetch("{{ route('issue') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token for security
            }
        })
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            if (data.success) {
                document.getElementById('message').textContent = "Login successful. Redirecting...";
                document.getElementById('message').classList.add("text-success");
                setTimeout(() => {
                    window.location.href = "{{ route('issue') }}"; // Redirect to the 'issue' route on success
                }, 1000);
            } else {
                document.getElementById('message').textContent = "Invalid email or password.";
                document.getElementById('message').classList.add("text-danger");
            }
        })
        .catch(error => {
            document.getElementById('message').textContent = "An error occurred. Please try again.";
            document.getElementById('message').classList.add("text-danger");
        });
    });
</script>

</body>
</html>
