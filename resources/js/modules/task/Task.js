const t = function Task({ id, name, description, status, created_at}) {
    this.id = id;
    this.name = name;
    this.description = description;
    this.status = status;
    this.created_at = created_at;
}

export default t;
