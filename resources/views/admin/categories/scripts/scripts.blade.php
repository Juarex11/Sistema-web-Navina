<script>
function categoriesPage(){
return {

editOpen:false,
showOpen:false,

category:{
id:null,
name:'',
status:1
},

openEdit(c){
if(!c || !c.id) return
this.showOpen = false
this.category = {...c}
this.editOpen = true
},

closeEdit(){
this.editOpen = false
this.resetCategory()
},

openShow(c){
if(!c || !c.id) return
this.editOpen = false
this.category = {...c}
this.showOpen = true
},

closeShow(){
this.showOpen = false
this.resetCategory()
},

resetCategory(){
this.category = {
id:null,
name:'',
status:1
}
}

}
}
</script>