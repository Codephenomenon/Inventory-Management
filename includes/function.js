const ajax = new XMLHttpRequest();

const container = document.getElementById('list-container');
const inputBar = document.getElementById('inputBar');
const inputButton = document.getElementById('inputButton');

window.addEventListener('load', function() {

  ajax.open('GET', './utils/listInventory.php', true);
  ajax.onreadystatechange = handler;
  ajax.send(null);

  // Initial display of inventory items on Home page
  function handler() {
    if (ajax.readyState == 4 && ajax.status == 200) {
      container.innerHTML = "";
      let json = JSON.parse(ajax.responseText);
      let markup;

      for (let i = 0; i < json.length; i++) {
          markup = `
          <div class="card col-md-4 col-sm-6" style="padding: 10px;">
          <img class="card-img-top" src="./images/${json[i].item_img}" style="max-width:200px;" alt="${json[i].item_description}" />
            <div class="card-body">
              <h5 class="card-title">${json[i].item_name}</h5>
              <p class="card-text">${json[i].item_description}</p>
              <h6 class="card-subtitle mb-2 text-muted float-left">$${json[i].item_cost}</h6><p class="float-right"><small class="text-muted">${json[i].item_amount} in stock.</small></p>

            </div>
          </div>
          `;
          container.insertAdjacentHTML('afterbegin', markup);
      }
    } else {
        console.log('error with ajax object, status: ' + ajax.status + ', readyState: ' + ajax.readyState);
      }
  }; // handler()

  // Event Listeners for homepage
  inputBar.addEventListener('change', displayMatches);
  inputBar.addEventListener('keyup', displayMatches);
  inputButton.addEventListener('click', displayMatches);

});

// handler for processing orders
function processOrder(order_id) {
  ajax.open('POST', './utils/processOrders.php');
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  ajax.send(encodeURI('id=' + order_id));
  setTimeout(function() {
    window.location.reload();
  }, 500);
}; // processOrder()

// AJAX response for user searches
function displayMatches() {
  let search = inputBar.value;
  ajax.open('POST', './utils/listInventorySearch.php', true);
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  ajax.send(encodeURI('search=' + search));
  ajax.onreadystatechange = handler;
}

function displayCategory(id) {
  let search = id;
  ajax.open('POST', './utils/listInventoryCategory.php', true);
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  ajax.send(encodeURI('search=' + search));
  ajax.onreadystatechange = handler;
}
