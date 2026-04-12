<script>
    const openModal = (ov) => {

        const overlay = document.querySelector(`#${ov}`)
        let content

        if (overlay.querySelector("form")) {

            content = overlay.querySelector("form")

        } else {

            content = overlay.querySelector(".modalContent")
        }

        overlay.classList.remove("hidden")
        overlay.classList.add("flex")

        content.addEventListener('click', function(e) {
            e.stopPropagation()
        })

        overlay.addEventListener('click', function() {
            overlay.classList.add('hidden')
        })

    }
</script>
 
<script>
    const data = JSON.parse(document.getElementById("adminProductsView").dataset.products)
    const products = data.data

    products.map(el => {

        const updateProductModal = document.getElementById(`updateProduct-${el.id}`)

        const dropZone = updateProductModal.querySelector("#dropZone")
        const fileInput = updateProductModal.querySelector("#imageInput")
        const previewImage = updateProductModal.querySelector("#previewImage")
        const previewContainer = updateProductModal.querySelector("#previewContainer")

        dropZone.addEventListener("click", () => {
            fileInput.click();
        });

        dropZone.addEventListener("dragover", (e) => {
            e.preventDefault();
        });

        dropZone.addEventListener("drop", (e) => {
            e.preventDefault();

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                showPreview(files[0]);
            }
        });

        fileInput.addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (!file) return;

            showPreview(file);
        });

        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        }

    })
</script>

<script>
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
</script>