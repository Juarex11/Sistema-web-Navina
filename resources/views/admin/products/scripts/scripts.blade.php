<script>
    function productsPage() {
        const categoriesData = @js($categories);
        const subcategoriesData = @js($subcategories);
        const initialProductState = () => ({
            id: '',
            subcategory_id: '',
            category_id: '',
            name: '',
            description: '',
            use_mode: '',
            benefits: '',
            status: 1,
            price: '',
            stock: 0,
            discount: 0,
        });

        return {
            allCategories: categoriesData,
            allSubcategories: subcategoriesData,
            currentImageIndex: 0,

            openCreateModal: false,
            openEditModal: false,
            openShowModal: false,
            productData: initialProductState(),

            setProduct(button) {
                const product = JSON.parse(button.getAttribute('data-product'));
                this.productData = { ...product };
                this.imagesPreview = [];
                this.currentImageIndex = 0;
            },
            // Flechas
            nextImage() {
                if (this.productData.images && this.productData.images.length > 0) {
                    this.currentImageIndex = (this.currentImageIndex + 1) % this.productData.images.length;
                }
            },
            prevImage() {
                if (this.productData.images && this.productData.images.length > 0) {
                    this.currentImageIndex = (this.currentImageIndex - 1 + this.productData.images.length) % this.productData.images.length;
                }
            },

            get filteredSubcategories() {
                if (!this.productData.category_id) return [];
                return this.allSubcategories.filter(s => s.category_id == this.productData.category_id);
            },

            imagesPreview: [],

            handlePreview(e) {
                this.imagesPreview = [];
                const files = Array.from(e.target.files);

                files.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        this.imagesPreview.push(event.target.result);
                    };
                    reader.readAsDataURL(file);
                });
            },

            openCreate() {
                this.productData = initialProductState();
                this.imagesPreview = [];
                this.openCreateModal = true;
            },

            setProduct(button) {
                const product = JSON.parse(button.getAttribute('data-product'));
                this.productData = { ...product };
                this.imagesPreview = [];
            },

            openEdit(button) {
                this.setProduct(button);
                this.imagesPreview = [];
                this.openEditModal = true;
            },

            openShow(button) {
                this.setProduct(button);
                this.openShowModal = true;
            },
        }
    }
</script>