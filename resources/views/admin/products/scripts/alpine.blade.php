<script>
  const adminProductsPage = (cat, subcat) => {

    return {

      categoriesData: cat,
      subCategoriesData: subcat,
      openEditModal: false,
      openCreateModal: false,
      openShowModal: false,

      productData: {

        id: '',
        category_id: '',
        subcategory_id: '',
        name: '',
        description: '',
        use_mode: '',
        benefits: '',
        status: 1,
        price: '',
        stock: 0,
        discount: 0,
        images: [],

      },

      imagesPreview: [],

      openCreate() {
        this.openCreateModal = true
      },

      openEdit(data) {
        this.productData = {
          ...data,
          category_id: String(data.category_id),
          subcategory_id: String(data.subcategory_id),
        }
        this.openEditModal = true
      },

      openShow(data) {
        this.productData = {
          ...data
        }
        this.openShowModal = true
      },

      filteredSubcategories() {
        return this.subCategoriesData.filter(sub =>
          sub.category_id == this.productData.category_id
        )
      },

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

      updateURL() {
        return `/admin/products/${this.productData.id}`
      }

    }
  }
</script>