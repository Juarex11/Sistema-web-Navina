<script>
    function clientsPage() {
        return {
            openEditModal: false,
            openCreateModal: false,
            // Objeto para almacenar los datos del cliente seleccionado
            clientData: {
                id: '',
                name: '',
                lastname: '',
                email: '',
                phone: '',
                district: '',
                message: ''
            },

            // Función para abrir el modal de edición con datos
            openEdit(client) {
                this.clientData = { ...client }; // Copiamos los datos del cliente al objeto
                this.openEditModal = true;
            },

            // Función para abrir el modal de creación
            openCreate() {
                this.openCreateModal = true;
            }
        }
    }
</script>