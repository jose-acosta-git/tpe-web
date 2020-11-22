<div class="card col text-white bg-dark align-self-center" style="width: 18rem; height: 50%;">
    <div class="card-body">
        <h5 class="card-title">{$item->email}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Rol: 
            {if ($item->admin)}
                Administrador
            {else}
                Usuario
            {/if}
        </h6>
        {if ($item->admin)}
            <a href="descender/{$item->id}" class="card-link btn btn-secondary btn-sm">Quitar permisos de administración</a>
        {else}
            <a href="ascender/{$item->id}" class="card-link btn btn-secondary btn-sm">Asignar permisos de administración</a>
        {/if}
        <a href="eliminar-usuario/{$item->id}" class="card-link btn btn-secondary btn-sm">Eliminar usuario</a>
    </div>
</div>