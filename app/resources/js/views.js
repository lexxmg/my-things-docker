export function userCard({user, description, json = {}}) { 
  //const {user, description, json = {}} = props;
  
  return `
      <div class="user-card" data-id="${user.id}">
          <img class="user-card__img"
            src="${user.thumbnail ? /storage/ + user.thumbnail : ''}"
            alt="${description}"
          >

          <div class="user-card__inner">
            <div class="user-card__top">
              <h3 class="user-card__title">Имя:</h3>
              <span class="user-card__text">${user.id}--${json.current_page}--${user.name}</span>

              <div class="user-card__arrow icon-chevron-right"></div>
            </div>

            <div class="user-card__content">
              <p class="user-card__description">${description}</p>
            </div>

            <a class="user-card__link link-js" href="user/${user.id}/edit" aria-label="Открыть карточку"></a>
          </div>
        </div>
      </div>
     `
}