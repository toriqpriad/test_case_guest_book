<template>
    <div>
        <nav className="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div className="container">
                <inertia-link className="navbar-brand" href="/">LARAVEL + INERTIA.JS</inertia-link>
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarCollapse">
                    <ul className="navbar-nav me-auto mb-2 mb-md-0">
                        <li className="nav-item">
                            <inertia-link className="nav-link" href="/posts/">POSTS</inertia-link>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link" href="https://santrikoding.com/ebook" target="_blank">EBOOK</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link" href="https://santrikoding.com/tutorial-set" target="_blank">TUTORIAL
                                SET</a>
                        </li>
                    </ul>
                    <form className="d-flex">
                        <input className="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button className="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <main className="container mt-5">
            <slot/>
        </main>
    </div>
</template>

<script>
export default {}
</script>

<style scoped>
.mt-5 {
    margin-top: 100px !important;
}
</style>
