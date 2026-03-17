    <script>
    document.querySelectorAll(".editButton").forEach(button => {
    button.addEventListener("click", function(){
        const id = this.dataset.id
        const name = this.dataset.name
        const category = this.dataset.category
        const sub_category = this.dataset.sub_category
        const status = this.dataset.status
        const price = this.dataset.price
        const stock = this.dataset.stock
        const discount = this.dataset.discount
        const description = this.dataset.description
        const benefits = this.dataset.benefits
        document.getElementById("editName").value = name
        document.getElementById("editCategory").value = category
        document.getElementById("editSubCategory").value = sub_category
        document.getElementById("editStatus").value = status
        document.getElementById("editPrice").value = price
        document.getElementById("editStock").value = stock
        document.getElementById("editDiscount").value = discount
        document.getElementById("editDescription").value = description
        document.getElementById("editBenefits").value = benefits
        document.getElementById("editForm").action =
            `/products/${id}`
        })
    })

    document.querySelectorAll(".showButton").forEach(button => {
    button.addEventListener("click", function(){
        const id = this.dataset.id
        const name = this.dataset.name
        const category = this.dataset.category
        const sub_category = this.dataset.sub_category
        const status = this.dataset.status
        const price = parseFloat(this.dataset.price)
        const discount = parseFloat(this.dataset.discount)
        let finalprice;
        if (discount > 0){
            finalprice = (price - ((discount/100) * price)).toFixed(2)
        }else{
            finalprice = price
        }
        const description = this.dataset.description
        const benefits = this.dataset.benefits
        const image = this.dataset.images
        document.getElementById("showName").textContent = name
        document.getElementById("showCategory").textContent = category
        document.getElementById("showSubCategory").textContent = sub_category
        document.getElementById("showStatus").textContent = status == 1 ? "Disponible" : "No disponible"
        document.getElementById("showPrice").textContent = price
        document.getElementById("showFinalPrice").textContent = finalprice
        document.getElementById("showDescription").textContent = description
        document.getElementById("showBenefits").textContent = benefits
        if(image){
        document.getElementById("showImage").src = "/storage/" + image
        }else{
        document.getElementById("showImage").src = ""
        }
        })
    })
    </script>
    <script>
// Preview crear
const imagesInputCreate = document.getElementById('imagesInputCreate');
const previewContainerCreate = document.getElementById('previewImagesCreate');

imagesInputCreate.addEventListener('change', function() {
    previewContainerCreate.innerHTML = '';
    Array.from(this.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('w-20', 'h-20', 'object-cover', 'rounded-md', 'border', 'border-gray-300');
            previewContainerCreate.appendChild(img);
        }
        reader.readAsDataURL(file);
    });
});

// Preview editar
const imagesInputEdit = document.getElementById('imagesInputEdit');
const previewContainerEdit = document.getElementById('previewImagesEdit');

imagesInputEdit.addEventListener('change', function() {
    previewContainerEdit.innerHTML = '';
    Array.from(this.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('w-20', 'h-20', 'object-cover', 'rounded-md', 'border', 'border-gray-300');
            previewContainerEdit.appendChild(img);
        }
        reader.readAsDataURL(file);
    });
});

// Limpiar al cerrar modal
const createModal = document.getElementById('createModal');
createModal.addEventListener('hidden.bs.modal', () => {
    imagesInputCreate.value = '';
    previewContainerCreate.innerHTML = '';
});

const editModal = document.getElementById('editModal');
editModal.addEventListener('hidden.bs.modal', () => {
    imagesInputEdit.value = '';
    previewContainerEdit.innerHTML = '';
});
</script>