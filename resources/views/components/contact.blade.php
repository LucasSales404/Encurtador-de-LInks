  <div id="contactForm"
      class=" absolute top-[90px] backdrop-blur-sm bg-black/30 z-40 form-contato w-full h-[calc(100vh-10px)]  flex justify-center items-center ">
      <div class="form-content p-10 bg-neutral-900 rounded-[5px]">
          <div class="flex">
              <div class="title-form w-full flex justify-center h-[60px]">
                  <h1 class="font-medium text-2xl">Entre em Contato</h1>
              </div>
              <p id="buttonClose" class="button-close cursor-pointer text-[18px] font-medium">X</p>
          </div>
          <form action="index.blade.php" method="POST" class="flex flex-col gap-[10px]">
              <div class="input-content w-[500px] flex flex-col gap-[2px]">
                  <label class="font-medium" for="url">Email</label>
                  <input class="bg-neutral-800 rounded-[3px] border-0 w-full h-[45px]" required
                      placeholder="Insira seu email" type="email" name="email">
              </div>
              <div class="input-content w-[500px] flex flex-col gap-[2px]">
                  <label class="font-medium" for="url">Mensagem</label>
                  <textarea placeholder="Insira sua mensagem" class="bg-neutral-800 rounded-[3px] h-[120px] border-0 w-full " name="message" required></textarea>
              </div>
               <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
              <button type="submit"
                  class="button-submit rounded-[3px] border-0 w-full h-[45px] font-medium bg-azulPadrao hover:bg-blue-700">Enviar</button>
          </form>
      </div>
  </div>
