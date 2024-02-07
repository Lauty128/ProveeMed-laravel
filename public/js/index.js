//----> Components
const PaginationDiv = document.querySelector('.CardsContainer__pagination');
const FiltersForm = document.querySelector('.FilterComponent');
const OrderSelect = document.querySelector('#sort-input');
const ResetButton = document.querySelector('#ResetButton');

//----> Configs
const queries = new URLSearchParams(window.location.search);
const CONFIGS = {
    domain: window.location.origin,
    url: (PaginationDiv && PaginationDiv.dataset) ? PaginationDiv.dataset.pagination : '',
    page: (PaginationDiv && PaginationDiv.datase) ? PaginationDiv.dataset.current : 0,
    filters: {
        province: queries.get('province') || -1,
        category: queries.get('category') || -1,
        name: queries.get('name') || null,
    },
    order: (PaginationDiv && PaginationDiv.datase) ? PaginationDiv.dataset.current : 1
}

//----> Functions
function define_filters(filters){
    let params = new URLSearchParams();
    params.set('page', CONFIGS.page);
    params.set('order', CONFIGS.order);

    if(filters.name) params.set('name', filters.name);
    if(filters.category) params.set('category', filters.category);
    if(filters.province) params.set('province', filters.province);

    return params.toString();
}

function change_order(){

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


//----> Events
OrderSelect.addEventListener('change', (e) => {
    console.log('CAMBIO POR');
    console.log(e.target.value);
    console.log('--------------------------');
})

PaginationDiv.addEventListener('click', (e) => {
    const page = e.target.dataset.page;
    if(page) change_page(page);
})


FiltersForm.addEventListener('submit', (e) => {
    e.preventDefault();
    submit_filter(e.target);
})

// Reset filters
ResetButton.addEventListener('click',(e) => {
    e.preventDefault();
    window.location.replace(CONFIGS.url);
})