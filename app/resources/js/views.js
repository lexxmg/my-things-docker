export function userCard(props = {}) { 
  //const currentPage = props.json.current_page || '';
  
  return `
      <div class="user-card" data-id="${props.user.id}">
          <img class="user-card__img" src="" alt="">

          <div class="user-card__inner">
            <div class="user-card__top">
              <h3 class="user-card__title">Имя:</h3>
              <span class="user-card__text">${props.user.id}----${props.user.name}</span>

              <div class="user-card__arrow icon-chevron-right"></div>
            </div>

            <div class="user-card__content">
              <p class="user-card__description">${props.description}</p>
            </div>

            <a class="user-card__link link-js" href="user/${props.user.id}/edit" aria-label="Открыть карточку"></a>
          </div>
        </div>
      </div>
     `
}