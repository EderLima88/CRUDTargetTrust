<nav class="navbar navbar-inverse">  <!-- o FLUID faz o elemento se esticar por toda largura da tela -->
  <div class="container">

    <!-- =====================================BURGER MENU - MOBILE=========================================== -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-crud">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">CRUD</a>
    </div>

    <div class="collapse navbar-collapse" id="menu-crud">

      <ul class="nav navbar-nav"><!-- Para CADA ITEM NOVO no MENU vai um LI -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Departamentos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="listar-departamentos.php">Listar</a></li>
            <li><a href="form-departamentos.php">Inserir</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Funcionarios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="listar-funcionarios.php">Listar</a></li>
            <li><a href="form-funcionarios.php">Inserir</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="logout.php">LOGOUT</a>
        </li>
      </ul>


    </div>
  </div>
</nav>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>