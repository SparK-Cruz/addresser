require('./bootstrap');

(function(){
    let busy = false;
    const form = document.querySelector('#search');
    const query = document.querySelector('#query');
    const queryBtn = document.querySelector('#query-btn');

    const resultsElement = document.querySelector('#results');
    const resultTemplate = document.querySelector('#result-template').cloneNode(true);
    resultTemplate.id = null;
    resultTemplate.style.display = 'block';

    form.addEventListener('submit', e => {
        e.preventDefault();

        if (busy) return;

        query.disabled = true;
        queryBtn.disabled = true;
        busy = true;

        const httpClient = axios.create();
        httpClient.defaults.timeout = 10000;

        httpClient.get(
            [
                '/api/addresses/search',
                encodeURI(query.value)
            ].join('/')
        ).then(response => {
            query.disabled = false;
            queryBtn.disabled = false;
            busy = false;
            displayResults(response.data);
        });
    });

    function displayResults(results) {
        resultsElement.textContent = '';

        results.forEach(result => {
            const element = resultTemplate.cloneNode(true);
            for (let attr in result) {
                const value = element.querySelector('.'+attr+' span.value');
                if (!value) continue;
                value.innerText = result[attr];
            }
            resultsElement.appendChild(element);
        });
    }
})();
