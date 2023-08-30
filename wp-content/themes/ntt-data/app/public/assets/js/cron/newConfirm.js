console.log('> confirm');

class NewConfirm{

	constructor(){

    }
    cod(texto,callback){
		const boxConfirm = document.createElement("div");
		boxConfirm.style.left =  (window.innerWidth/2) - (569 * .5)+"px";
		boxConfirm.style.top = '150px';
		boxConfirm.id = 'newConfirm';
		boxConfirm.style = ' flex-direction:column;display:flex; position:absolute; top:20%; left:0%; width:300px; height:300px ';

		const btnConfirmar = document.createElement("button");
		btnConfirmar.textContent = 'Confirmar';
		btnConfirmar.addEventListener('click',	()=>{this.confirmar(callback)})
		btnConfirmar.className = 'botaoBox';
				
		const btnCancelar = document.createElement("button");
		btnCancelar.textContent = 'Cancelar';
		btnCancelar.addEventListener('click', () => {this.cancelar(callback)})
		btnCancelar.className = 'botaoBox';


		const head = document.createElement("div");
            head.innerHTML = "Atenção";

		const body = document.createElement("div");
            body.innerHTML = texto;

		const footer = document.createElement("div");
            footer.innerHTML = '';

            boxConfirm.insertAdjacentElement("beforeend",head);
            boxConfirm.insertAdjacentElement("beforeend",body);
            boxConfirm.insertAdjacentElement("beforeend",footer);
            boxConfirm.insertAdjacentElement("beforeend",btnConfirmar);
            boxConfirm.insertAdjacentElement("beforeend",btnCancelar);


		document.querySelector('html').append(boxConfirm);
        return
	}
	async confirmar(callback){
        console.log(TimerView);
        TimerView._stopTimer();
        await onSaveTimer();
        TimerView._resetTimer();
	}
	cancelar(callback){
	}
}