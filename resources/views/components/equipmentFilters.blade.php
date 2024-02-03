<form class="FilterComponent">
    <h3>🔎 Filtros</h3>

    <div class='FilterComponent__div'>
        <label class='FilterComponent__label' for="word-input">Nombre</label>
        <input class='FilterComponent__input' id='word-input' type="text" name='word' />
    </div>
    <div class='FilterComponent__div'>
        <label class='FilterComponent__label' for="category-input">Categoria</label>
        <select name="category" id="category-input" class='FilterComponent__input'>
            <option value="-1">Todas</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" class='FilterComponent__submit' value='Filtrar' />
    <button class='FilterComponent__submit FilterComponent__submit--reset'>Reiniciar</button>
</form>