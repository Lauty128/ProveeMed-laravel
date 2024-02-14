if(document.querySelector('.FilterComponent')){
    //-------------------------------------------------------------------------------------------
    //---------------------------------------> Components <--------------------------------------
    //-------------------------------------------------------------------------------------------
    const PaginationDiv = document.querySelector('.CardsContainer__pagination');
    const CardsContainer = document.querySelector('.CardsContainer');
    const FiltersForm = document.querySelector('.FilterComponent');
    const OrderSelect = document.querySelector('#sort-input');
    const ResetButton = document.querySelector('#ResetButton');

    //--------------------------------------------------------------------------------------------
    //---------------------------------------> Configs <------------------------------------------
    //--------------------------------------------------------------------------------------------
    const queries = new URLSearchParams(window.location.search);
    const CONFIGS = {
        domain: window.location.origin,
        url: (CardsContainer && CardsContainer.dataset) ? CardsContainer.dataset.pagination : '',
        page: (PaginationDiv && PaginationDiv.dataset) ? PaginationDiv.dataset.current : 0,
        filters: {
            province: queries.get('province') || -1,
            category: queries.get('category') || -1,
            name: queries.get('name') || null,
        },
        order: queries.get('order') || 1
    }

    //-------------------------------------------------------------------------------------------
    //---------------------------------------> Functions <---------------------------------------
    //-------------------------------------------------------------------------------------------
    function define_filters(filters){
        let params = new URLSearchParams();
        params.set('page', CONFIGS.page);
        params.set('order', CONFIGS.order);

        if(filters.name) params.set('name', filters.name);
        if(filters.category) params.set('category', filters.category);
        if(filters.province) params.set('province', filters.province);

        return params.toString();
    }

    function change_order(order){
        let url = CONFIGS.url + '?';
        CONFIGS.order = order;

        const params = define_filters(CONFIGS.filters);
        url += params;
        window.location.replace(url);
    }

    function submit_filter(form){
        let url = CONFIGS.url + '?';
        const Form = new FormData(form);

        const filters = { 
            name: Form.get('name'),
            category: Form.get('category'),
            province: Form.get('province'),
        }
        const params = define_filters(filters);
        url += params;
        window.location.replace(url);
    }

    function change_page(page){
        let url = CONFIGS.url + '?';
        CONFIGS.page = page;
        url += define_filters(CONFIGS.filters);
        window.location.replace(url);
    }

    function load_initial_filters(){
        // Order field
        OrderSelect.childNodes.forEach(element => {
            if(element.value && element.value == CONFIGS.order) element.setAttribute('selected','true');
        });

        // Name field
        document.querySelector('#name-input').value = CONFIGS.filters.name || '';
        
        // Category field
        document.querySelector('#category-input').childNodes.forEach(element => {
            if(element.value && element.value == CONFIGS.filters.category) element.setAttribute('selected','true');
        });

        // Province field
        if(document.querySelector('#province-input')){
            document.querySelector('#province-input').childNodes.forEach(element => {
                if(element.value && element.value == CONFIGS.filters.province) element.setAttribute('selected','true');
            });
        }
    }


    //--------------------------------------------------------------------------------------------
    //---------------------------------------> Events <-------------------------------------------
    //--------------------------------------------------------------------------------------------
    // Order
    OrderSelect.addEventListener('change', (e) => change_order(e.target.value) )

    // Pagination
    if(PaginationDiv){
        PaginationDiv.addEventListener('click', (e) => {
            const page = e.target.dataset.page;
            if(page) change_page(page);
        })
    }

    // Filters
    FiltersForm.addEventListener('submit', (e) => {
        e.preventDefault();
        submit_filter(e.target);
    })

    // Reset filters
    ResetButton.addEventListener('click',(e) => {
        e.preventDefault();
        window.location.replace(CONFIGS.url);
    })

    //-------------------------------------------------------------------------------------------
    //---------------------------------------> Start <-------------------------------------------
    //-------------------------------------------------------------------------------------------
    load_initial_filters();
}