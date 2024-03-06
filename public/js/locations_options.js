//------> Components
const ProvinceOptionTag = document.getElementById('ProvinceOptionTag');
const DepartmentOptionTag = document.getElementById('DepartmentOptionTag');
const CityOptionTag = document.getElementById('CityOptionTag');

//------> Configs
const URL_BASE_GEOREF = 'https://apis.datos.gob.ar/georef/api/'
const currentCityId = CityOptionTag.dataset.current;

function verifyCities(){

}

function load_departments(){
    const fragment = document.createDocumentFragment();
    
    if(!ProvinceOptionTag.value || ProvinceOptionTag.value == "02"){ 
        DepartmentOptionTag.value = ''
        DepartmentOptionTag.style.display = 'none'
        return
    }

    DepartmentOptionTag.innerHTML = '<option value="">Cargando...</option>';
    DepartmentOptionTag.style.display = 'inline-block'

    function print(departments){
        departments.forEach(department => {
            const option = document.createElement('option');
            
            option.value = department.id + '-' + department.nombre;
            option.textContent = department.nombre;

            fragment.appendChild(option)
        });

    DepartmentOptionTag.innerHTML = '<option value=""></option>';
    DepartmentOptionTag.appendChild(fragment)
    }

    fetch(URL_BASE_GEOREF + 'departamentos' + '?provincia=' + ProvinceOptionTag.value + '&campos=id,nombre&max=150&orden=nombre')
        .then(result => result.json())
        .then((result) => print(result.departamentos))
        .catch((err) => console.log(err));
}

// function change
function load_cities(){
    const fragment = document.createDocumentFragment();
    let id = '';

    if(!DepartmentOptionTag.value){
        CityOptionTag.value = '' 
        return 
    }

    CityOptionTag.innerHTML = '<option value="">Cargando...</option>';
    id = DepartmentOptionTag.value.split('-')[0]

    function print(cities){
        cities.forEach(city => {
            const option = document.createElement('option');
            
            option.value = city.id + '-' + city.nombre;
            option.textContent = city.nombre;

            fragment.appendChild(option)
        });

    CityOptionTag.innerHTML = '<option value=""></option>';
    CityOptionTag.appendChild(fragment)
    }

    fetch(URL_BASE_GEOREF + 'localidades-censales' + '?departamento=' + id + '&campos=id,nombre&max=150&orden=nombre')
        .then(result => result.json())
        .then((result) => print(result.localidades_censales))
        .catch((err) => console.log(err));

}

ProvinceOptionTag.addEventListener('change', () => {
    load_departments()

    if(!ProvinceOptionTag.value){ load_cities() }
})

DepartmentOptionTag.addEventListener('change', () => {
    load_cities()
})

//-----> Initialize
load_departments()
