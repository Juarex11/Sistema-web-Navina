<script>
    function subcategoriesPage() {
        return {
            openEditModal: false,

            subcategoryData: {
                id: '',
                category_id: '',
                name: '',
            },

            openEdit(subcategory) {
                this.subcategoryData = { ...subcategory};
                this.openEditModal = true;
            }
        }
    }
</script>