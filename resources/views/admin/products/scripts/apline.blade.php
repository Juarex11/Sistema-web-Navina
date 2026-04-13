<script>
    document.addEventListener('alpine:init', () => {

        Alpine.data('productsPage', () => ({
            createOpen: false,
            editOpen: false,
            showOpen: false,
            showProduct: {},
            currentImageIndex: 0,

            categories: @js($categories),
            subcategories: @js($subcategories),

            productForm: {
                id: null,
                name: '',
                category_id: '',
                subcategory_id: '',
                price: '',
                stock: '',
                discount: '',
                description: '',
                benefits: '',
                use_mode: '',
                status: 1
            },

            openShowFromButton(el) {
                const product = JSON.parse(el.dataset.product)

                this.showProduct = { ...product }
                this.currentImageIndex = 0

                this.showOpen = true
            },

            openEditFromButton(el) {
                const product = JSON.parse(el.dataset.product)

                this.createOpen = false

                this.productForm = {
                    id: product.id,
                    name: product.name,
                    category_id: product.category_id,
                    subcategory_id: product.subcategory_id,
                    status: product.status,
                    price: product.price,
                    stock: product.stock,
                    discount: product.discount,
                    description: product.description,
                    benefits: product.benefits,
                    use_mode: product.use_mode
                }

                this.editOpen = true
            },

            get filteredSubcategories() {
                if (!this.productForm.category_id) return []
                return this.subcategories.filter(
                    s => s.category_id == this.productForm.category_id
                )
            },

            openCreate() {
                this.resetForm()
                this.editOpen = false
                this.createOpen = true
            },

            closeCreate() {
                this.createOpen = false
            },

            openShow(product) {
                this.showProduct = { ...product };
                this.showOpen = true;
            },
            closeShow() {
                this.showOpen = false;
            },

            nextImage() {
                if (!this.showProduct.images?.length) return

                this.currentImageIndex =
                    (this.currentImageIndex + 1) % this.showProduct.images.length
            },

            prevImage() {
                if (!this.showProduct.images?.length) return

                this.currentImageIndex =
                    (this.currentImageIndex - 1 + this.showProduct.images.length)
                    % this.showProduct.images.length
            },

            openEdit(product) {
                this.createOpen = false
                this.productForm = { ...product }
                this.editOpen = true
            },

            closeEdit() {
                this.editOpen = false
            },

            resetForm() {
                this.productForm = {
                    id: null,
                    name: '',
                    category_id: '',
                    subcategory_id: '',
                    price: '',
                    stock: '',
                    discount: '',
                    description: '',
                    benefits: '',
                    use_mode: '',
                    status: 1
                }
            }

        }))

    })
</script>