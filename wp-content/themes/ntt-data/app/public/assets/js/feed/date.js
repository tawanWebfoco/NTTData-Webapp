function iniciarContagemRegressiva(dataFinal) {
            const contador = setInterval(function() {
            const agora = new Date().getTime();
        
            dataFinal = new Date(dataFinal);
            // console.log(dataFinal);
            const diferenca = dataFinal - agora;

            const day = document.querySelector('.downbanner .right .day .number');
            const hours = document.querySelector('.downbanner .right .hours .number');
            const minute = document.querySelector('.downbanner .right .minute .number');
            const second = document.querySelector('.downbanner .right .second .number');

        if (diferenca < 0) {
            clearInterval(contador);
            document.querySelector('.downbanner p').innerHTML = "Tempo Expirado!";
        } else {
            let dias = Math.floor(diferenca / (1000 * 60 * 60 * 24));
            let horas = Math.floor((diferenca % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutos = Math.floor((diferenca % (1000 * 60 * 60)) / (1000 * 60));
            let segundos = Math.floor((diferenca % (1000 * 60)) / 1000);


           
            if(dias < 10){
                dias = '0' + dias;
            }
            if(horas < 10){
                horas = '0' + horas;
            }
            if(minutos < 10){
                minutos = '0' + minutos;
            }
            if(segundos < 10){
                segundos = '0' + segundos;
            }
            day.innerHTML = `${dias}`;
            hours.innerHTML = `${horas}`;
            minute.innerHTML = `${minutos}`;
            second.innerHTML = `${segundos}`;
           
        }
    }, 1000); 
}
iniciarContagemRegressiva('2023-09-04T00:00:00');
