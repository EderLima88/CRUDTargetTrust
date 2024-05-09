<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/crud2.css">
</head>
<body>
    <div class="container">
        <form action="valida-login.php" method="POST">
            <div class="panel panel-primary text-center" id="panel-login">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                
                <div class="panel-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario" >
                        </div>
                    </div>                   
                   
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                            <input type="password" class="form-control" name="senha" placeholder="Senha" >
                        </div>
                    </div>                                        
                    
                    <button type="submit"  class="btn btn-primary">LOGIN</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>