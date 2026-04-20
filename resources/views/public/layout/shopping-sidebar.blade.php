<section class="h-screen hidden justify-end bg-black/80 backdrop-blur-sm fixed inset-0 z-30 opacity-0"
  id="shoppingCartDrawer">

  <aside class="w-130 flex flex-col bg-white transform translate-x-full transition-transform duration-300"
    id="shoppingCartPanel">

    <header class="flex justify-between items-center p-5 border-b-1.5 border-neutral-200">

      <h1 class="text-xl text-neutral-600 font-semibold xl:text-2xl">Tu Carrito</h1>

      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-x cursor-pointer"
        id="closeShoppingCartButton">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M6.707 5.293l5.293 5.292l5.293 -5.292a1 1 0 0 1 1.414 1.414l-5.292 5.293l5.292 5.293a1 1 0 0 1 -1.414 1.414l-5.293 -5.292l-5.293 5.292a1 1 0 1 1 -1.414 -1.414l5.292 -5.293l-5.292 -5.293a1 1 0 0 1 1.414 -1.414" />
      </svg>

    </header>

    <section class="flex-1 divide-y divide-neutral-200 overflow-y-auto"
      id="productsCartContainer"></section>

    <section class="p-5 border-t-1.5 border-neutral-200 shrink-0"
      id="totalContainer"></section>

  </aside>

</section>

<script>
  window.addEventListener('DOMContentLoaded', () => {

    const drawer = document.getElementById("shoppingCartDrawer")
    const openButton = document.getElementById("shoppingCartButton")
    const closeButton = document.getElementById("closeShoppingCartButton")
    const panel = document.getElementById("shoppingCartPanel")

    // abrir
    openButton.addEventListener('click', () => {

      drawer.classList.remove('hidden')
      drawer.classList.add('flex')

      // pequeño delay para animación
      setTimeout(() => {
        drawer.classList.remove('opacity-0', 'duration-300')
        panel.classList.remove('translate-x-full')
      }, 10)
    })

    // cerrar
    const closeDrawer = () => {
      drawer.classList.add('opacity-0', 'duration-300')
      panel.classList.add('translate-x-full')

      setTimeout(() => {
        drawer.classList.remove('flex')
        drawer.classList.add('hidden')
      }, 300) // igual al duration
    }

    closeButton.addEventListener("click", closeDrawer)

    // clickc en el bg cierra el drawer
    drawer.addEventListener('click', closeDrawer)

    // Click en el panel no cierra drawer
    panel.addEventListener('click', (e) => {
      e.stopPropagation()
    })

    // para actualizar UI
    window.dispatchEvent(new Event('cartUpdated'))

  })
</script>

<script>
  const renderCartProducts = () => {

    const cart = JSON.parse(localStorage.getItem("cart")) || []
    const container = document.getElementById("productsCartContainer")
    container.innerHTML = ""

    if (cart.length > 0) {

      cart.forEach(el => {

        let discount = el.price * el.discount / 100
        const total = (el.price - discount) * el.count

        container.insertAdjacentHTML('beforeend', `

          <article class="p-5 flex flex-col gap-3">
  
            <div class="flex gap-5 items-center">
            
              <img class="size-22 rounded-md object-cover shrink-0"
              src="/storage/${el.image}"></img>
  
              <div class="flex-1">
                <p class="text-lg text-neutral-600 font-medium">${el.name}</p>
                <p class="flex gap-3 text-indigo-950 font-semibold">

                  <span class="${el.discount > 0 && "line-through text-neutral-400"}">
                    S/ ${el.price}
                  </span>

                  <span class="${el.discount < 1 && "hidden"}">
                    S/ ${el.price - discount}
                  </span>

                </p>
                <p class="text-red-400 font-semibold">-S/${(discount * el.count).toFixed(2)} </p>
              </div>
  
              <div class="shrink-0 my-auto">
                <p class="text-green-400 text-xl font-semibold">S/ ${total.toFixed(2)}</p>
              </div>
  
            </div>
  
            <div class="flex gap-3 justify-center items-center">
  
              <button class="p-1.5 rounded-full border border-neutral-300 cursor-pointer 
              disabled:opacity-50 disabled:cursor-not-allowed"
              type="button"
              onclick="countDown(${el.id})"
              ${el.count == 1 ? "disabled" : ""}>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="icon icon-tabler icons-tabler-outline icon-tabler-minus size-5">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l14 0" /></svg>
              </button>
  
              <p>${el.count}</p>
              
              <button class="p-1.5 rounded-full border border-neutral-300 cursor-pointer"
              type="button" 
              onclick="countUp(${el.id})">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="icon icon-tabler icons-tabler-outline icon-tabler-plus size-5">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              </button>
  
              <button class="p-1.5 rounded-full border border-neutral-300 cursor-pointer text-red-400
              hover:text-white hover:bg-red-400"
              type="button"
              onclick="deleteCartProduct(${el.id})">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-trash size-5">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007zm-10 4a1 1 0 0 0 -1 1v6a1 1 0 0 0 2 0v-6a1 1 0 0 0 -1 -1m4 0a1 1 0 0 0 -1 1v6a1 1 0 0 0 2 0v-6a1 1 0 0 0 -1 -1" /><path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005z" /></svg>
              </button>
  
            </div>  

          </article>
      `)
      })

    } else {

      container.insertAdjacentHTML("beforeend", `
        
        <div class="p-5">
        
          <article class="flex flex-col gap-3 items-center">

            <h1 class="text-xl text-neutral-600 font-semibold text-center">No hay productos en el carrito</h1>  
            
            <a class="max-w-max py-2 px-4 rounded-lg bg-indigo-950 text-white"
            href="/products">
              Explorar Productos
            </a>

          </article>
        
        </div>

      `)
    }
  }


  const renderTotalToPay = () => {

    const cart = JSON.parse(localStorage.getItem("cart")) || []
    const container = document.getElementById("totalContainer")
    container.innerHTML = ""

    if (cart.length > 0) {

      let totalToPay = 0

      cart.forEach(el => {

        const discount = el.price * el.discount / 100
        const priceToPay = (el.price - discount) * el.count

        totalToPay += priceToPay

      })

      container.insertAdjacentHTML('beforeend', `

        <header class="flex justify-between items-center pb-4">
          <p class="text-xl text-neutral-700 font-semibold">Total</p>
          <p class="text-xl text-neutral-700 font-semibold">S/ ${totalToPay.toFixed(2)}</p>
        </header>

        <div class="grid grid-cols-2 gap-4">

          <button class="py-3 px-4 rounded-lg border border-neutral-300 font-medium cursor-pointer"
          onclick="deleteAllCart()">
            Vaciar Carrito
          </button>

          <button class="py-3 px-4 rounded-lg flex gap-2 items-center text-white bg-green-400 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp size-5">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
            <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
            </svg>
            Comprar por whatsApp
          </button>

        </div>

      `)

    }

  }


  const countUp = (id) => {

    const cart = JSON.parse(localStorage.getItem("cart")) || []

    const newCart = cart.map(item =>
      item.id == id ? {
        ...item,
        count: item.count + 1
      } :
      item
    )

    // guardar cambios
    localStorage.setItem("cart", JSON.stringify(newCart))

    // notificar a la UI
    window.dispatchEvent(new Event("cartUpdated"))

  }


  const countDown = (id) => {

    const cart = JSON.parse(localStorage.getItem("cart")) || []

    const newCart = cart.map(item =>
      item.id == id ? {
        ...item,
        count: item.count - 1
      } :
      item
    )

    localStorage.setItem("cart", JSON.stringify(newCart))
    window.dispatchEvent(new Event("cartUpdated"))

  }


  const deleteCartProduct = (id) => {

    const cart = JSON.parse(localStorage.getItem("cart")) || []

    const newCart = cart.filter(el => el.id != id)

    localStorage.setItem("cart", JSON.stringify(newCart))
    window.dispatchEvent(new Event("cartUpdated"))

  }


  const deleteAllCart = () => {

    const cart = JSON.parse(localStorage.getItem("cart")) || []

    localStorage.removeItem("cart")
    window.dispatchEvent(new Event("cartUpdated"))

  }


  window.addEventListener("DOMContentLoaded", () => {
    renderCartProducts()
    renderTotalToPay()
  })

  window.addEventListener("cartUpdated", () => {
    renderCartProducts()
    renderTotalToPay()
  })
</script>