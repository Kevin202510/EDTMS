import fetch from "../modules/fetcher.js";

$("body").on("click", "#edit", async (e) =>
  state.show($(e.currentTarget).data("id"))
);
$("body").on("click", "#delete", (e) =>
  state.delete($(e.currentTarget).data("id"))
);
$("body").on("click", "#view", (e) =>
  state.view($(e.currentTarget).data("id"))
);

$("#filesearch").keyup(function () {
  var value = $("#filesearch").val().toLowerCase();
  $("#main-table tr").filter(function () {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  });
});

const state = {
  entity: "documents",
  attributes: [
    "category_name",
    "file_document_name",
    "created_at",
    "updated_at",
  ],
  model: [],
  activeIndex: 0,
  btnSave: document.getElementById("btn-mul"),
  inputMethod: document.getElementById("method"),
  user_id: document.getElementById("active_user_id").value,

  btnNew: document.getElementById("create-new"),

  init: () => {
    state.btnNew.addEventListener("click", state.addnew);
    state.btnNew.disabled = false;
    state.ask();
  },
  ask: () => {
    $.get(
      "" + state.entity + "/" + state.entity + "Crud.php",
      { user_id: state.user_id, getData: "getData" },
      function (data, status) {
        var datas = JSON.parse(data);
        $.each(datas, function (index, value) {
          state.model.push(value);
        });
        state.model.forEach((models) => fetch.writer(state.attributes, models));
      }
    );
  },
  addnew: () => {
    56789;
    state.btnSave.innerHTML = "Save Changes";
    state.inputMethod.setAttribute("name", "addNew");
    state.btnSave.addEventListener("click", state.save);
    state.btnSave.removeEventListener("click", state.update);
    fetch.showModal();
  },
  save: async (e) => {
    e.preventDefault();
    let params = $("#formData").serializeArray();
    var fd = new FormData();
    // console.log(params);
    params.forEach((para) => {
      fd.append(para.name, para.value);
    });
    fd.append("file", $("#file_document_name")[0].files[0]);

    let model = await fetch.save(state.entity, fd);
    if (model) {
      $("#exampleModal").modal("hide");
      state.model = [];
      state.ask();
    }
  },
  show: (i) => {
    state.activeIndex = i;
    state.btnSave.innerHTML = "Update Changes";
    state.inputMethod.setAttribute("name", "update");
    state.btnSave.addEventListener("click", state.update);
    state.btnSave.removeEventListener("click", state.save);
    fetch.showOnModal(state.model[i]);
  },
  view: (i) => {
    // fetch.showOnModalView(state.model[i]);
    $("#viewDocument").modal("show");
    $("#documentto").attr(
      "src",
      `../assets/documents/${state.model[i].email}/${state.model[i].file_document_name}`
    );
  },
  update: async () => {
    let params = $("#formData").serializeArray();
    var fd = new FormData();
    // console.log(params);
    params.forEach((para) => {
      fd.append(para.name, para.value);
    });
    fd.append("file", $("#file_document_name")[0].files[0]);

    let model = await fetch.save(state.entity, fd);
    if (model) {
      $("#exampleModal").modal("hide");
      state.model = [];
      state.ask();
    }
  },
  delete: async (i) => {
    // alert(i);
    let params = { id: i, delete: "delete" };
    let res = await fetch.remove(state.entity, params);
    if (res) {
      state.model = [];
      state.ask();
    }
  },
};

window.addEventListener("load", state.init);
