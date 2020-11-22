<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand my-0 py-0" href="home">
        <img class="my-0 py-0" src="images/anime-world.png" width="50" alt="logo" loading="lazy">
    </a>
    <a class="navbar-brand">Anime World</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav d-flex w-100">
            <li class="nav-item active">
                <a class="nav-link" href="home">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href= "listar">Reviews</a>
            </li>
            <li class="nav-item dropdown w-25">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorias
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    {foreach from=$categories item=category}
                        <section class="row container my-1">
                            <a class="dropdown-item col-4" href="filtrar/{$category->id}">{$category->name}</a> 
                            {if (isset($smarty.session.EMAIL_USER) && ($smarty.session.ADMIN)) }
                                <a class='btn btn-danger btn-sm col-3 mx-1' href="eliminar-categoria/{$category->id}">Eliminar</a>
                                <a class='btn btn-primary btn-sm col-3 mx-1' href="editar-categoria/{$category->id}">Editar</a>
                            {/if}
                        </section>
                    {{/foreach}}
                    {if (isset($smarty.session.EMAIL_USER) && ($smarty.session.ADMIN))}
                        <div class="alert alert-danger mt-2 mb-0" role="alert">
                            ¡Advertencia!: Si eliminas una categoría, también se borrarán todas las reviews pertencientes a la misma ¯\_( ͡ಠ ● ͡ಠ)_/¯
                        </div>
                    {/if}
                </div>
            </li>
            <li class="nav-item dropdown ml-auto">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {if isset($smarty.session.EMAIL_USER)}
                Usuario (logged)
                {else}
                Usuario
                {/if}
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right mr-0" aria-labelledby="navbarDropdownMenuLink">
                    {if (isset($smarty.session.EMAIL_USER) && ($smarty.session.ADMIN))}
                        <a class="dropdown-item" href="agregar">Agregar review o categoría</a>
                        <a class="dropdown-item" href="logout/">Logout</a>
                    {else if isset($smarty.session.EMAIL_USER)}
                        <a class="dropdown-item" href="logout/">Logout</a>
                    {else}
                        <a class="dropdown-item" href="show-login">Login</a>
                        <a class="dropdown-item" href="show-register">Registrarse</a>
                    {/if}
                </div>
            </li>
        </ul>
    </div>
</nav>

<main class="container-fluid mt-4 mb-5">