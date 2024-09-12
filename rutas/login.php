<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Scripts de Bootstrap (jQuery requerido) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!--<script src="/js/popper.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" >Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="cargando" align="center"></div>
    <div id="succes"></div>
    <div id="danger"></div>

   <!-- Bootstrap JS and dependencies -->
    <script src="js/login.js"></script>
    
</body>
</html>