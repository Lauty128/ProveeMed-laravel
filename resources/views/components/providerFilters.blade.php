<form class="FilterComponent">
    <div class='FilterComponent__div'>
        <label class='FilterComponent__label' for="word-input">Buscar</label>
        <input class='FilterComponent__input' id='word-input' type="text" name='word' />
    </div>
    <div class='FilterComponent__div'>
        <label class='FilterComponent__label' for="category-input">Categoria</label>
        <select name="category" id="category-input" class='FilterComponent__input'>
            <option value="-1">Todas</option>
            
        </select>
    </div>
    <input type="submit" class='FilterComponent__submit' value='FILTRAR' />
    <button class='FilterComponent__submit'>REINICIAR</button>
</form>