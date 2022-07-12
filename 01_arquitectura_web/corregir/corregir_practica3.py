import argparse
import json
import os

from urllib.parse import urlparse


if __name__ == "__main__":
    parser = argparse.ArgumentParser()
    parser.add_argument("-u", "--github-users", required=True, help="File with GitHub users, one user per line")
    parser.add_argument("-a", "--apache-path", required=True, help="Apache directory")
    args = parser.parse_args()

    with open(args.github_users, "r") as fd:
        github_users = [ line[:-1] for line in fd.readlines() ]

    for user in github_users:
        github_url = f"git@github.com:{user}/dwes-tema1.git"

        os.system(f"git clone {github_url}")

        with open("dwes-tema1/practica3.json", "r") as fd:
            data = json.load(fd)

        total = 0
        ok = 0
        for obj in data:
            url = obj["url"]
            response_path = obj["path"]

            path = os.path.join(args.apache_path, urlparse(url).path[1:])
            if path == response_path:
                ok += 1
            total += 1

        os.system("rm -rf dwes-tema1")

        print()
        print("==========================================")
        print(f"Nota {user}:", round(ok / total * 10, 2))
        print("==========================================")
        print()

