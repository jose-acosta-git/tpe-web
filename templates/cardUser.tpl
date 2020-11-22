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
        <a href="modificar-rol/{$item->id}" class="card-link btn btn-secondary btn-sm">Cambiar permisos de administración</a>
        <a href="eliminar-usuario/{$item->id}" class="card-link btn btn-secondary btn-sm">Eliminar usuario</a>
    </div>
</div>