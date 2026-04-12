<div x-show="editOpen" x-cloak x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div @click.outside="closeEdit()" class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">
        <div class="flex justify-between mb-3">
            <p class="text-3xl font-bold">
                Editar subcategoría
            </p>
            <button @click="closeEdit()" class="text-gray-500 hover:text-black hover:-translate-y-1 text-xl transition-all">
                ✕
            </button>
        </div>
        <p class="text-gray-400 pb-2">
            Modifica los detalles de la subcategoría.
        </p>
        <form :action="`{{ url('subcategories') }}/${subcategory.id}`" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="font-bold block mb-1">Categoría principal:</label>
                <select x-model="subcategory.category_id" class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="font-bold block mb-1">Nombre:</label>
                <input x-model="subcategory.name" class="w-full px-3 py-2 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-pink-300" type="text" name="name" placeholder="Nombre de la subcategoría" required>
            </div>
            <div class="mb-4 flex justify-end">
                <button class="text-white bg-pink-400 hover:bg-pink-500 hover:-translate-y-1 py-2 px-4 transition-all rounded-md" type="submit">
                    Editar subcategoría
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function subcategoriesPage(){
return {

editOpen:false,

subcategory:{
id:null,
name:'',
category_id:null
},

openEdit(c){
if(!c || !c.id) return
this.subcategory = {...c}
this.editOpen = true
},

closeEdit(){
this.editOpen = false
this.resetSubcategory()
},

resetSubcategory(){
this.subcategory = {
id:null,
name:'',
category_id:null
}
}

}
}
</script>