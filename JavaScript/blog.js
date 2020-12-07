//tags
const arrStr = ['#javascript', '#webdev', '#beginner', '#react', '#tutorial', '#java', '#python', '#programming', '#css', '#html', '#devops', '#productivity'];

arrStr.map(elm => {
    const selectionDiv = document.createElement('div');
    selectionDiv.classList.add('selection');
    selectionDiv.classList.add('hover-effect');

    selectionDiv.innerHTML += `<a href=''>${elm}</a>`;
    selectionDiv.innerHTML += `<button class='btn btn-sm bg-primary text-light ml-auto'>Follow</button>`;

    const tagContainer = document.getElementById('tag-container');
    tagContainer.appendChild(selectionDiv);
});

const optionListSecondNavbar = document.getElementsByClassName('check-active');

for (let i = 0; i < optionListSecondNavbar.length; i++) {
    optionListSecondNavbar[i].addEventListener('click', (e) => {
        const current = document.getElementsByClassName('active');
        current[0].className = current[0].className.replace(' active', '');
        e.target.className += ' active';
    });
};


// corona-api fetch and count effect
const coronaBdTodayCases = document.getElementById('coronabd-today-cases');
const coronaBdTotalCases = document.getElementById('coronabd-total-cases');

fetch('https://corona.lmao.ninja/v2/countries/Bangladesh?yesterday')
    .then(res => res.json())
    .then(res => {
        const { cases, todayCases } = res;
        doCountEffect(cases, coronaBdTotalCases);
        doCountEffect(todayCases, coronaBdTodayCases);
    });

const doCountEffect = (cases, showingPlace) => {
    let count = 0;
    setInterval(function () {

        if (count <= cases) {
            showingPlace.innerHTML = count;
            if (cases < 20000) {
                count += 5;
            } else {
                count += 1000;
            }

            if (cases - count < 0) {
                showingPlace.innerHTML = cases;
            }
        }
    }, 10);
};


//news api fetching

const articleContainer = document.getElementById('articles-container');

fetch("https://dev.to/api/articles")
    .then(res => res.json())
    .then(res => {
        res.map(articles => {
            const newDiv = document.createElement('div');
            const newAnchorTag = document.createElement('a');
            newDiv.classList.add('p-3');
            newAnchorTag.setAttribute('href', articles.url)

            newAnchorTag.append(articles.title);
            newDiv.append(newAnchorTag);

            articleContainer.append(newDiv);
            // console.log(articles.url);
        })
    })

//hide tag
function hideIt() {
    document.getElementById('hide').style.display = 'none';
}