// import 'slim-select'
import debounce from 'debounce';
import TomSelect from 'tom-select';

let ajax = debounce((query, callback) => {
    let params = new URLSearchParams({ search: query});

    fetch(window.usersAjaxRoute + '?' + params.toString())
        .then(res => res.json())
        .then(json => callback(json.data))
        .catch(err => callback());
}, 150);

let choice = new TomSelect('#users', {
    load: ajax,
    preload: true,
    render: {
        no_results: (data,escape) => {
			return '<div class="no-results">Aucun résultat pour "'+escape(data.input)+'"</div>';
		},
    }
})
