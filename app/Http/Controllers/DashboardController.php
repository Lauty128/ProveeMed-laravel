<?php

namespace App\Http\Controllers;

//----> Dependencies

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

//----> Models
use App\Models\Provider;
use App\Models\Equipment;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    // Each methods of this class has the middleware "Auth"


    /*  
    ██████╗░░██████╗░░░█████╗░░██╗░░░██╗░██╗░██████╗░░███████╗░██████╗░░░██████╗
    ██╔══██╗░██╔══██╗░██╔══██╗░██║░░░██║░██║░██╔══██╗░██╔════╝░██╔══██╗░██╔════╝
    ██████╔╝░██████╔╝░██║░░██║░╚██╗░██╔╝░██║░██║░░██║░█████╗░░░██████╔╝░╚█████╗░
    ██╔═══╝░░██╔══██╗░██║░░██║░░╚████╔╝░░██║░██║░░██║░██╔══╝░░░██╔══██╗░░╚═══██╗
    ██║░░░░░░██║░░██║░╚█████╔╝░░░╚██╔╝░░░██║░██████╔╝░███████╗░██║░░██║░██████╔╝
    ╚═╝░░░░░░╚═╝░░╚═╝░░╚════╝░░░░░╚═╝░░░░╚═╝░╚═════╝░░╚══════╝░╚═╝░░╚═╝░╚═════╝░
    */
    
    public function providers_list(Request $request){
        $providers = new Provider();
        if($request->search) $providers = $providers->where('name', 'like', '%'.$request->search.'%');
        
        $queries = $request->all();
        $providers = $providers->paginate(15);

        return view('dashboard.providers', compact('providers', 'queries'));
    }

    public function provider_update_page(string $id){
        
        $provider = Provider::find($id);
        $provinces = App('provinces');

        return view('dashboard.edit.provider', compact('provider', 'provinces'));
    }

    public function provider_location_update_page(string $id){
        
        $provider = Provider::find($id);
        $provinces = App('provinces');

        return view('dashboard.edit.provider_location', compact('provider', 'provinces'));
    }

    public function provider_create_page()
    {
        $provinces = App('provinces');

        return view('dashboard.create.providers', compact('provinces'));
    }

    public function provider_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:50',
            'image' => 'image|nullable|max:500',
            'web' => 'string|nullable|max:100',
            'mail' => 'email|nullable|max:100',
            'phone' => 'string|nullable|max:40',
            'province' => 'string|required',
            'department' => 'string|nullable',
            'city' => 'string|required',
            'address' => 'string|nullable|max:100'
        ]);
        
        if($validator->fails()){
            return redirect()
                    ->route('dashboard.providers.create--page')
                    ->withInput()  // This is to use the global function old() in the blade.php file
                    ->withErrors($validator);
        };

        //-----------> Configs
        $provinces = App::make('provinces');
        $province_name = $provinces[$request->province];
        $department = null;

        if($request->department) $department = explode('-', $request->department);
        $city = explode('-', $request->city);

        //-----------> Store images
        $image_name = null;
        $directory = 'public/images/providers';
        if($request->hasFile('image')){
            $image_name = time().'.'.$request->file('image')->extension();
            $request->file('image')->storeAs($directory, $image_name);
        };

        Provider::create([
            'name' => $request->name,
            'image' => $image_name,
            'web' => $request->web,
            'phone' => $request->phone,
            'mail' => $request->mail,
            'province_id' => $request->province,
            'province' => $province_name,
            'department_id' => ($department) ? $department[0] : null,
            'department' => ($department) ? $department[1] : null,
            'city_id' => $city[0],
            'city' => $city[1],
            'address' => $request->address
        ]);

        return redirect()->route('dashboard.providers')->with('success', 'Nuevo proveedor agregado correctamente');
    }

    public function provider_location_update(Request $request, $id)
    {
        //------> Validate provider
        $provider = Provider::find($id);
        if(!$provider){
            return redirect()->route('dashboard.providers')->with('error', 'No se encontro el proveedor');
        }

        //------> Validate fields
        $validator = Validator::make($request->all(), [
            'province' => 'string|required',
            'department' => 'string|nullable',
            'city' => 'string|required',
            'address' => 'string|nullable|max:100'
        ]);
        if($validator->fails()){
            return redirect()
                    ->route('dashboard.providers_location.update--page')
                    ->withErrors($validator);
        };

        //-----------> Configs
        $provinces = App::make('provinces');
        $province_name = $provinces[$request->province];
        $department = null;

        if($request->department) $department = explode('-', $request->department);
        $city = explode('-', $request->city);

        $provider->update([
            'province_id' => $request->province,
            'province' => $province_name,
            'department_id' => ($department) ? $department[0] : null,
            'department' => ($department) ? $department[1] : null,
            'city_id' => $city[0],
            'city' => $city[1],
            'address' => $request->address
        ]);

        return redirect()->route('dashboard.providers')->with('success', 'Proveedor actualizado correctamente');
    }

    public function provider_update(Request $request, $id)
    {
        //------> Validate provider
        $provider = Provider::find($id);
        if(!$provider){
            return redirect()->route('dashboard.providers')->with('error', 'No se encontro el proveedor');
        }

        //------> Validate fields
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:50',
            'image' => 'image|nullable|max:500',
            'web' => 'string|nullable|max:100',
            'mail' => 'email|nullable|max:100',
            'phone' => 'string|nullable|max:40',
        ]);
        if($validator->fails()){
            return redirect()
                    ->route('dashboard.providers.update--page', ['id' => $provider->id])
                    ->withErrors($validator);
        };
        
        //-----> Store images
        $image_name = null ?? $provider->image;
        $directory = 'public/images/providers';
        if($request->hasFile('image')){
            $image_name = time().'.'.$request->file('image')->extension();
            $request->file('image')->storeAs($directory, $image_name);
            Storage::delete($directory.'/'.$provider->image);
        };

        $provider->update([
            ...$request->all(),
            'image' => $image_name
        ]);

        return redirect()->route('dashboard.providers')->with('success', 'Proveedor actualizado correctamente');
    }

    public function delete_provider($id){
        $provider = Provider::find($id);
        if(!$provider){
            return redirect()->route('dashboard.providers')->with('error', 'No se encontro el proveedor');
        }

        $provider->delete();

        return redirect()->route('dashboard.providers')->with('success', 'Proveedor eliminado correctamente');
    }

    
    /*
    ███████╗░░██████╗░░██╗░░░██╗░██╗░██████╗░░███╗░░░███╗░███████╗░███╗░░██╗░████████╗░░██████╗
    ██╔════╝░██╔═══██╗░██║░░░██║░██║░██╔══██╗░████╗░████║░██╔════╝░████╗░██║░╚══██╔══╝░██╔════╝
    █████╗░░░██║██╗██║░██║░░░██║░██║░██████╔╝░██╔████╔██║░█████╗░░░██╔██╗██║░░░░██║░░░░╚█████╗░
    ██╔══╝░░░╚██████╔╝░██║░░░██║░██║░██╔═══╝░░██║╚██╔╝██║░██╔══╝░░░██║╚████║░░░░██║░░░░░╚═══██╗
    ███████╗░░╚═██╔═╝░░╚██████╔╝░██║░██║░░░░░░██║░╚═╝░██║░███████╗░██║░╚███║░░░░██║░░░░██████╔╝
    ╚══════╝░░░░╚═╝░░░░░╚═════╝░░╚═╝░╚═╝░░░░░░╚═╝░░░░░╚═╝░╚══════╝░╚═╝░░╚══╝░░░░╚═╝░░░░╚═════╝░
    */

    public function equipments_list(Request $request){
        
        $equipments = new Equipment();
        if($request->search) $equipments = $equipments->where('name', 'like', '%'.$request->search.'%');

        $equipments = $equipments->paginate(20);
        return view('dashboard.equipments' , compact('equipments'));
    }

    public function equipments_create_page(){
        
        $categories = Category::all();

        return view('dashboard.create.equipments', compact('categories'));
    }

    public function equipments_update_page(string $id){
        
        $equipment = Equipment::find($id);
        $categories = Category::all();

        return view('dashboard.edit.equipment', compact('equipment', 'categories'));
    }

    public function equipments_create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:60',
            'category_id' => 'integer|required',
            'image' => 'image|nullable|max:500',
            'umdns' => 'string|nullable|max:10',
            'description' => 'string|nullable|max:300',
            'specifications' => 'file|nullable|max:10000',
            'price' => 'integer|nullable',
        ]);
        
        if($validator->fails()){
            return redirect()
                    ->route('dashboard.equipments.create--page')
                    ->withInput()  // This is to use the global function old() in the blade.php file
                    ->withErrors($validator);
        };

        //-----------> Store images
        $image_name = null;
        $directory = 'public/images/equipments';
        if($request->hasFile('image')){
            $image_name = time().'.'.$request->file('image')->extension();
            $request->file('image')->storeAs($directory, $image_name);
        };

        //-----------> Speficications file
        $specification_name = null;
        $directory = 'public/images/equipments/specifications';
        if($request->hasFile('specifications')){
            $specification_name = time().'.'.$request->file('specifications')->extension();
            $request->file('specifications')->storeAs($directory, $specification_name);
        };

        Equipment::create([
            'name'   => $request->name,
            'image' => $image_name,
            'category_id' => $request->category_id,
            'umdns' => $request->umdns,
            'description' => $request->description,
            'specifications' => $specification_name,
            'price' => $request->price,
        ]);

        return redirect()->route('dashboard.equipments')->with('success', 'Nuevo equipo agregado correctamente');
    }

    public function delete_equipment($id){
        $equipment = Equipment::find($id);

        $equipment->delete();

        return redirect()->route('dashboard.equipments')->with('success', 'Equipo eliminado correctamente');
    }

    /*
    
    ░█████╗░░█████╗░████████╗███████╗░██████╗░░█████╗░██████╗░██╗███████╗░██████╗
    ██╔══██╗██╔══██╗╚══██╔══╝██╔════╝██╔════╝░██╔══██╗██╔══██╗██║██╔════╝██╔════╝
    ██║░░╚═╝███████║░░░██║░░░█████╗░░██║░░██╗░██║░░██║██████╔╝██║█████╗░░╚█████╗░
    ██║░░██╗██╔══██║░░░██║░░░██╔══╝░░██║░░╚██╗██║░░██║██╔══██╗██║██╔══╝░░░╚═══██╗
    ╚█████╔╝██║░░██║░░░██║░░░███████╗╚██████╔╝╚█████╔╝██║░░██║██║███████╗██████╔╝
    ░╚════╝░╚═╝░░╚═╝░░░╚═╝░░░╚══════╝░╚═════╝░░╚════╝░╚═╝░░╚═╝╚═╝╚══════╝╚═════╝░
    */
    
    public function categories_list(Request $request){
        $categories = Category::all();
    
        return view('dashboard.categories', compact('categories'));
    }
    
    public function categories_update_page(string $id){
        $category = Category::find($id);
    
        return view('dashboard.edit.categories', compact('category'));
    }
    
    public function categories_create_page()
    {
        return view('dashboard.create.categories');
    }
    
    public function categories_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:40',
            'description' => 'string|nullable|max:300',
        ]);
        
        if($validator->fails()){
            return redirect()
                    ->route("dashboard.categories.create--page")
                    ->withInput()  // This is to use the global function old() in the blade.php file
                    ->withErrors($validator);
        };
    
        Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
    
        return redirect()->route("dashboard.categories")->with('success', 'Nueva categoria agregada correctamente');
    }

    public function categories_update(Request $request, string $id)
    {
        $category = Category::find($id);
        if(!$category){
            return redirect()
                    ->route("dashboard.categories")
                    ->with("error", "No se encontró la categoria a editar");
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:40',
            'description' => 'string|nullable|max:250',
        ]);
        
        if($validator->fails()){
            return redirect()
                    ->route("dashboard.categories.update--page", ["id" => $category->id])
                    ->withErrors($validator);
        };
    
        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
    
        return redirect()->route("dashboard.categories")->with('success', 'Elemento modificado correctamente');
    }
    
    public function categories_delete($id){
        $category = Category::find($id);
    
        if(!$category){
            return redirect()
                    ->route("dashboard.categories")
                    ->with("error", "No se encontró la categoria a eliminar");
        }
        $category->delete();
    
        return redirect()->route('dashboard.categories')->with('success', 'Categoria eliminada correctamente');
    }



}
