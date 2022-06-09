var input = document.getElementById('letters');
var target = document.getElementById('topics');

function getTopics(id) {
  $.ajax({
    type: "POST",
    url: './functions/getTopics.php',
    data: {
      id: id
    },
    success: function(data) {
      removeOptions(target);
      target.innerHTML = data;
    }
  });
}

function removeOptions(selectbox) {
  var i;
  for (i = selectbox.options.length - 1; i >= 0; i--) {
    selectbox.remove(i);
  }
}
input.addEventListener('change', function() {
  getTopics(this.value);
});