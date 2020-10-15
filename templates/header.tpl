<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">Anime World</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="home">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href= "listar">Reviews</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorias
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            {foreach from=$categories item=category}
                <a class="dropdown-item " href="filtrar/{$category->id}">{$category->name}</a> 
                <a class='btn btn-danger btn-sm' href="eliminar-categoria/{$category->id}">Eliminar</a>
                <a class='btn btn-primary btn-sm' href="editar-categoria/{$category->id}">Editar</a>
            {{/foreach}}
                <div class="alert alert-danger mt-2 mb-0" role="alert">
                    Advertencia
                </div>
            </div>
        </li>
        </ul>
    </div>
    
    <div class="collapse navbar-collapse mr-0" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin
            </a>
            <div class="dropdown-menu dropdown-menu-lg-right mr-0" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item">Login</a>
                <a class="dropdown-item">Agregar review o categoría</a>
                <a class="dropdown-item" href="logout/">Logout</a>
            </div>
        </li>
        </ul>
    </div>
</nav>
<main class="container-fluid mt-4 mb-5">