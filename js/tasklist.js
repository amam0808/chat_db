// 承認ボタンがクリックされたときの処理
function toggleApproval(button) {
    if (button.textContent === "保存する") {
      button.textContent = "保存済";
      button.classList.remove("unapproved");
      button.classList.add("approved");
    } else {
      button.textContent = "保存する";
      button.classList.remove("approved");
      button.classList.add("unapproved");
    }
  }
  
  // 詳細情報の表示・非表示を切り替える処理
  function toggleDetails(button) {
    var taskItem = button.closest(".task__item"); // 親のtask__itemを見つける
    var taskDetails = taskItem.querySelector(".task__details");
  
    // 詳細を表示するか非表示にする
    taskDetails.classList.toggle("active");
  }
  
  // アクティブクラスが追加された場合、他の詳細を閉じる
  if (taskDetails.classList.contains("active")) {
    var allTaskDetails = document.querySelectorAll(".task__details");
    allTaskDetails.forEach(function (detail) {
      if (detail !== taskDetails && detail.classList.contains("active")) {
        detail.classList.remove("active");
      }
    });
  }