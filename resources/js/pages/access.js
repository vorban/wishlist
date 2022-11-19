import SlimSelect from "slim-select";
import debounce from 'debounce';

let ajax = debounce((search, callback) => {
    let params = new URLSearchParams({ search });

    fetch(window.usersAjaxRoute + '?' + params.toString())
        .then(res => res.json())
        .then(json => {
            let data = []
            json.data.forEach(i => data.push(i))
            callback(data)
        })
        .catch(err => callback(false));
}, 150);

let select = new SlimSelect({
    select: '#users',
    searchText: 'Aucun résultat.',
    searchingText: 'Recherche en cours.',
    searchPlaceholder: 'Jean-Sébastien Lefrançois',
    placeholder: "Cherchez un/des utilisateurs.",
    searchHighlight: true,
    ajax,
});
