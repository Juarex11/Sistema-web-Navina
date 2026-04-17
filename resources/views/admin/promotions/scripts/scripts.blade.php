<script>
    function promotionsPage() {
        return {
            openEditModal: false,
            openCreateModal: false,

            imagePreview: null,

            promotionData: {
                id: '',
                title: '',
                description: '',
                status: '',
                image: ''
            },

            openEdit(promotion) {
                this.promotionData = { ...promotion };
                this.imagePreview = promotion.image ? `/storage/${promotion.image}` : null;
                this.openEditModal = true;
            },

            openCreate() {
                this.promotionData = { id: '', title: '', description: '', status: true, image: '' };
                this.imagePreview = null;
                this.openCreateModal = true;
            },

            previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    this.imagePreview = URL.createObjectURL(file);
                }
            },
        }
    }
</script>