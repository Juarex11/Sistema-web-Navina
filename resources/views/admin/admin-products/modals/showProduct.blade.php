 <div class="modal fade hidden" id="showModal" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered modal-xl">
     <div class="modal-content">
       <div class="modal-body">
         <div class="flex justify-end">
           <button type="button" class="flex btn-close justify-end" data-bs-dismiss="modal"></button>
         </div>
         <div class="grid grid-cols-2 gap-0.5">
           {{-- IMÁGENES --}}
           <div class="col-auto" style="margin-left: 5%;margin-right: 5%">
             <img
               id="showImage"
               class="object-contain rounded-xl border border-gray-200 bg-gray-50"
               style="max-height: 520px; max-width: 383.6;">
           </div>
           {{-- INFO --}}
           <div>
             <h1 id="showName" class="mb-1 text-3xl font-extrabold text-gray-600 font-mulish"></h1>
             <div class="mb-1">
               <h5 class="font-bold text-pink-500 font-mulish">DESCRIPCIÓN:</h5>
               <p id="showDescription"></p>
             </div>
             <div class="mb-1">
               <h5 class="font-bold text-pink-500 font-mulish">BENEFICIOS:</h5>
               <p style="white-space: pre-line;" id="showBenefits"></p>
             </div>
             <div class="mb-1">
               <h5 class="font-bold text-pink-500 font-mulish">ESTADO:</h5>
               <div class="flex">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                 </svg>
                 <p class="font-bold" id="showStatus"></p>
               </div>
             </div>
             <div class="mb-1">
               <h5 class="font-bold text-pink-500 font-mulish">CATEGORÍA:</h5>
               <p class="font-bold" id="showCategory"></p>
             </div>
             <div class="mb-1 grid grid-cols-2">
               <div class="flex">
                 <p class="font-extrabold text-pink-500 font-mulish">S/.</p>
                 <p id="showFinalPrice" class="font-extrabold text-pink-500 font-mulish px-2"></p>
                 <s class="text-sm font-extrabold text-gray-300 font-mulish line-through ml-2">S/.</s>
                 <s id="showPrice" class="text-sm font-extrabold text-gray-300 font-mulish line-through ml-2"></s>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>