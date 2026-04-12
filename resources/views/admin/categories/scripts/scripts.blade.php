<script>
  function categoriesPage() {
    return {
      openEditModal: false,
      openShowModal: false,

      categoryData: {
        id: '',
        name: '',
        status: '',
      },

      openEdit(category) {
        this.categoryData = { ...category };
        this.openEditModal = true;
      },

      openShow(category) {
        this.categoryData = { ...category };
        this.openShowModal = true;
      },
    }
  }
</script>