<script>
    document.querySelectorAll(".editButton").forEach(button => {
    button.addEventListener("click", function(){
        const id = this.dataset.id
        const name = this.dataset.name
        const status = this.dataset.status
        document.getElementById("editName").value = name
        document.getElementById("editStatus").value = status
        document.getElementById("editForm").action =
            `/categories/${id}`
        })
    })

    document.querySelectorAll(".showButton").forEach(button => {
    button.addEventListener("click", function(){
        const id = this.dataset.id
        const name = this.dataset.name
        const status = this.dataset.status
        document.getElementById("showName").textContent = name
        document.getElementById("showStatus").textContent = status == 1 ? "Disponible" : "No disponible"
        })
    })
</script>