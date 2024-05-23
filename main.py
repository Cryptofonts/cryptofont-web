import os
import json

# Filename variables
old_snap = "snapshot.back.txt"
latest_snap = "snapshot.txt"
output_file = "diffs.txt"
json_file = 'json/cryptoicons.json'

def get_svg_files(directory):
    svg_files = [f for f in os.listdir(directory) if f.endswith('.svg')]
    return svg_files


def create_snapshot(filenames, latest_snap):
    with open(latest_snap, 'w') as file:
        for filename in filenames:
            file.write(f"{filename}\n")


def compare_files(old_snap, latest_snap, output_file):
    with open(old_snap, 'r') as f1, open(latest_snap, 'r') as f2:
        lines1 = f1.readlines()
        lines2 = f2.readlines()

    # Remove trailing whitespaces and newlines
    lines1 = [line.strip() for line in lines1]
    lines2 = [line.strip() for line in lines2]

    # Find differences
    diff1 = set(lines1) - set(lines2)
    diff2 = set(lines2) - set(lines1)

    new_entries = []
    print(f"📥 {len(diff2)} changes")
    for line in diff2:
        # Assuming the line format is "filename.svg"
        if line.endswith('.svg'):
            name_ticker = line[:-4]  # remove the ".svg" extension
            new_entry = {
                "name": name_ticker,
                "image": line,
                "ticker": name_ticker
            }
            new_entries.append(new_entry)
        else:
            print(f"Line '{line}' is in an unexpected format and was skipped.")

    if os.path.exists(json_file):
        with open(json_file, 'r') as jf:
            existing_data = json.load(jf)
    else:
        existing_data = []

    existing_data.extend(new_entries)

    with open(json_file, 'w') as jf:
        json.dump(existing_data, jf, indent=2)

    # Read the json file again
    with open(json_file, 'r') as file:
        svg_list =  json.load(file)
    
    sorted_data = sorted(svg_list, key=lambda x: x['ticker'])

    with open(json_file, 'w') as file:
        json.dump(sorted_data, file, indent=2)

    os.rename(latest_snap, old_snap)

def main():
    # Get list of SVG files from the directory
    directory = 'img/SVG'
    svg_files = get_svg_files(directory)
    create_snapshot(svg_files, latest_snap)
    compare_files(old_snap, latest_snap, output_file)


if __name__ == "__main__":
    main()
