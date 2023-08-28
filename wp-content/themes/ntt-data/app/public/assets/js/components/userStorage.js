console.log('> UserStorage.JS');

class UserStorage {
  // COLLECTION_USERS imported from global.js
  
  constructor() {}

  getStorage() {
    // console.log(localStorage.getItem('timer_states'));
    const user = JSON.parse(localStorage.getItem(COLLECTION_USERS));
    return user;
  }
  
  setStorage(user) {
    localStorage.setItem(COLLECTION_USERS, JSON.stringify(user));
    console.log(COLLECTION_USERS,user);
  }

  removeStorage() {
    localStorage.removeItem(COLLECTION_USERS);
    localStorage.removeItem(COLLECTION_TIMER);
  }
}